<?php
/**
 * @var modX $modx
 * @var ContentBlocks $contentBlocks
 * @var array $scriptProperties
 */
if ($modx->event->name == 'ContentBlocks_RegisterInputs') {
    // Load your own class. No need to require cbBaseInput, that's already loaded.
    $path = $modx->getOption('checkblock.core_path', null, MODX_CORE_PATH . 'components/checkblock/');
    require_once($path . 'elements/inputs/checkblock.class.php');
    $opts = array('assetsUrl' => $modx->getOption('checkblock.assets_url', null, $modx->getOption('assets_url',null,'assets/') . 'components/checkblock/'));
    $modx->regClientStartupHTMLBlock('<script>var ContentBlocksCheckBox = ' . $modx->toJson($opts) . '</script>');
    // Create an instance of your input type, passing the $contentBlocks var
    $instance = new checkblockInput($contentBlocks);
    
    // Pass back your input reference as key, and the instance as value
    $modx->event->output(array(
        'checkblock' => $instance
    ));
}