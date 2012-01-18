<?php
/**
 * PB_Process snippet
 *
 * Copyright 2011 Bob Ray
 *
 * @author Bob Ray
 * 1/17/12
 *
 * ProgressBar is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * ProgressBar is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * ProgressBar; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package progressbar
 */
/**
 * MODx ProgressBar Snippet
 *
 * Description Performs process and updates progress bar status chunk
  *
 * @package progressbar
 *
 *
 * @property pb_authorized_users (string) (optional)
 * Comma-separated list of IDs of authorized users, or 0 to
 * indicate that everyone is authorized
 *
 * @property pb_status_resource_id (integer) (required) ID of the status
 * resource (containing the status chunk tag). When sent as a
 * property in the snippet tag, will override the System Setting
 *
 * @property pb_status_chunk_id (integer) (required) ID of the status
 * chunk. When sent as a  property in the snippet tag, will override
 * the System Setting
 */

$props =& $scriptProperties;

/* check for authorized users if pb_authorized_users is set to anything but 0 */
$authorizedUsers = $modx->getOption('pb_authorized_users',$props);
if ($authorizedUsers != 0) {
    $pb_authorizedUsers = explode(',',$authorizedUsers );
        if (! in_array($modx->user->get('id'),$pb_authorizedUsers)) {
            return '<h2>Unauthorized User</h2>';
    }
}

/* chunk to use as status "file" */
$chunkId = $modx->getOption('pb_status_chunk_id',$props);
if (empty($chunkId)) {
    $chunkId = $modx->getOption('pb_status_chunk_id');
}


function update($percent, $text1, $text2, &$pb_target) {

    $msg = json_encode(array(
                'percent' => $percent,
                'text1' => $text1,
                'text2' => $text2,
            ));

    /* use a chunk for the status "file" */

        $pb_target->setContent($msg);
        $pb_target->save();


} /* end update function */

set_time_limit(0);

echo 'Started';

$pb_target = $modx->getObject('modChunk',(integer) $chunkId);

$users = array('Bob','Jim','Mary','Ted','Fred','Tex','Tommy', 'Algernon','Pinky','Frank','Dino','Zorba',
);
sort($users);
$count = count($users);
sleep(1);
for ($i = 1; $i <= count($users); $i++) {

    $percent = floor(($i/$count) * 100);

    /* Use this if you want two decimal places
       $percent = number_format(($i/$count) * 100,2);
    */

    $text1 = $i <6? "Group 1": "Group 2";
    $text2 = $users[$i - 1];
    update($percent, $text1, $text2, $pb_target);

    sleep(1);

}

/* Important: leave something valid in the status file so
 * the first ajax call in the loop won't fail because
 * the file isn't there on the next run
 * */
sleep(3); /* give time for the JS to retrieve the 100% status */
update(0,"Starting","", $pb_target);

return '';