<?php
/**
 * File containing view controller
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 *
 */

$Module = $Params['Module'];
$scriptID = $Params['ScriptID'];

$script = eZScheduledScript::fetch( $scriptID );
if ( is_object( $script ) )
    $scriptName = $script->attribute( 'name' );
else
    $scriptName = ezpI18n::tr( 'ezscriptmonitor', 'Script not found' );

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );
$tpl->setVariable( 'script', $script );

$Result = array();
$Result['content'] = $tpl->fetch( 'design:scriptmonitor/view.tpl' );
$Result['path'] = array( array( 'url' => '/scriptmonitor/list/',
                                'text' => ezpI18n::tr( 'ezscriptmonitor', 'Script monitor' ) ),
                         array( 'url' => false,
                                'text' => $scriptName ) );

?>
