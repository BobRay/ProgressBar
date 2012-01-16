<?php
/**
 * ProgressBar
 *
 *
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
 * ProgressBar; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package progressbar
 */
/**
 * Properties (property descriptions) Lexicon Topic
 *
 * @package progressbar
 * @subpackage lexicon
 */

/* ProgressBar Property Description strings */
$_lang['pb_aliastitle_desc'] = "(optional) Set to Yes to use lowercase, hyphenated, page title as alias. default: Yes - If set to No, 'article-(date created)' is used.  Ignored if alias is filled in form.";
$_lang['pb_badwords_desc'] = '(optional) Comma delimited list of words not allowed in document.';
$_lang['pb_cacheable_desc'] = "(optional) Sets the flag to as to whether or not the resource is cached; default: cache_default System Setting for new resources; set to `Parent` to use parent's setting.";
$_lang['pb_cancelid_desc'] = '(optional) Document id to load on cancel; default: http_referer.';
$_lang['pb_clearcache_desc'] = '(optional) When set to Yes, the cache will be cleared after saving the resource; default: Yes.';
$_lang['pb_cssfile_desc'] = '(optional) Name of CSS file to use, or `` for no CSS file; default: progressbar.css. File should be in assets/progressbar/css/ directory';
$_lang['pb_errortpl_desc'] = '(optional) Name of Tpl chunk for formatting field errors. Must contain [[+np.error]] placeholder.';
$_lang['pb_fielderrortpl_desc'] = '(optional) Name of Tpl chunk for formatting field errors. Must contain [[+np.error]] placeholder.';
$_lang['pb_footertpl_desc'] = '(optional) Footer Tpl chunk (chunk name) to be inserted at the end of a new document.';
$_lang['pb_groups_desc'] = "(optional) Resource groups to put new document in (no effect with existing docs); set to `parent` to use parent's groups.";
$_lang['pb_headertpl_desc'] = '(optional) Header Tpl chunk (chunk name) to be inserted at the beginning of a new document.';
$_lang['pb_hidemenu_desc'] = "(optional) Sets the flag to as to whether or not the new page shows in the menu; default: hidemenu_default System Setting for new resources; set to `Parent to use parent's setting";
$_lang['pb_initrte_desc'] = '(optional) Initialize rich text editor; set this if there are any rich text fields; default: No';
$_lang['pb_initdatepicker_desc'] = '(optional) Initialize date picker; set this if there are any date fields; default: Yes';
$_lang['pb_language_desc'] = '(optional) Language to use in forms and error messages.';
$_lang['pb_listboxmax_desc'] = '(optional) Maximum length for listboxes. Default is 8 items.';
$_lang['pb_multiplelistboxmax_desc'] = '(optional) Maximum length for multi-select listboxes. Default is 20 items.';
$_lang['pb_parentid_desc'] = '(optional) Folder id where new documents are stored; default: ProgressBar folder.';
$_lang['pb_postid_desc'] = '(optional) Document id to load on success; default: the page created or edited.';
$_lang['pb_prefix_desc'] = "(optional) Prefix to use for placeholders; default: 'np.'";
$_lang['pb_published_desc'] = "(optional) Set new resource as published or not (will be overridden by publish and unpublish dates). Set to `parent` to match parent's pub status; default: publish_default system setting.";
$_lang['pb_required_desc'] = '(optional) Comma separated list of fields/tvs to require.';
$_lang['pb_richtext_desc'] = "(optional) Sets the flag to as to whether or Rich Text Editor is used to when editing the page content in the Manager; default: richtext_default System Setting for new resources; set to `Parent` to use parent's setting.";
$_lang['pb_rtcontent_desc'] = '(optional) Use rich text for the content form field.';
$_lang['pb_rtsummary_desc'] = '(optional) Use rich text for the summary (introtext) form field.';
$_lang['pb_searchable_desc'] = "(optional) Sets the flag to as to whether or not the new page is included in site searches; default: search_default System Setting for new resources; set to `Parent` to us parent's setting.";
$_lang['pb_show_desc'] = '(optional) Comma separated list of fields/tvs to show.';
$_lang['pb_readonly_desc'] = '(optional) Comma-separated list of fields that should be read only; does not work with option or textarea fields.';
$_lang['pb_template_desc'] = "(optional) Name of template to use for new document; set to `parent` to use parent's template; for `parent`, &parentid must be set; default: the default_template System Setting.";
$_lang['pb_tinyheight_desc'] = '(optional) Height of richtext areas; default is `400px`.';
$_lang['pb_tinywidth_desc'] = '(optional) Width of richtext areas; default is `95%`.';
$_lang['pb_summaryrows_desc'] = '(optional) Number of rows for the summary field.';
$_lang['pb_summarycols_desc'] = '(optional) Number of columns for the summary field.';
$_lang['pb_outertpl_desc'] = '(optional) Tpl used as a shell for the whole page.';
$_lang['pb_texttpl_desc'] = '(optional) Tpl used for text resource fields.';
$_lang['pb_inttpl_desc'] = '(optional) Tpl used for integer resource fields.';
$_lang['pb_datetpl_desc'] = '(optional) Tpl used for date resource fields and date TVs';
$_lang['pb_booltpl_desc'] = '(optional) Tpl used for Yes/No resource fields (e.g., published, searchable, etc.).';
 $_lang['pb_optionoutertpl_desc'] = '(optional) Tpl used for as a shell for checkbox, list, and radio option TVs.';
$_lang['pb_optiontpl_desc'] = '(optional) Tpl used for each option of checkbox and radio option TVs.';
$_lang['pb_listoptiontpl_desc'] = '(optional) Tpl used for each option of listbox TVs.';
$_lang['pb_aliasprefix_desc'] = '(optional) Prefix to be prepended to alias for new documents with an empty alias; alias will be aliasprefix - timestamp';
$_lang['pb_intmaxlength_desc'] = '(optional) Max length for integer input fields; default: 10.';
$_lang['pb_textmaxlength_desc'] = '(optional) Max length for text input fields; default: 60.';
$_lang['pb_hoverhelp_desc'] = '(optional) Show help when hovering over field caption: default: Yes.';










