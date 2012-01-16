<?php

$props =& $scriptProperties;

$pb_authorizedUsers = explode(',', $modx->getOption('pb_authorized_users',$props));

/* check for authorized users if pb_authorized_users is set to anything but 0 */
if (!empty($pb_authorizedUsers)) {
    if (! in_array($modx->user->get('id'),$pb_authorizedUsers)) {
        return 'Unauthorized User';
    }
}

/* chunk to use as status "file" */
$pb_target = $modx->getObject('modChunk', array('name'=>'PB_Status'));


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

/* leave something valid in the status file so
 * the first ajax call in the loop won't fail because
 * the file isn't there on the next run
 * */
sleep(2);
update(0,"Starting","", $pb_target);

return '';