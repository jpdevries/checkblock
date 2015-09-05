<?php
class checkblockInput extends cbBaseInput {
    public $defaultIcon = 'checkbox';
    public $defaultTpl = '[[+value]]';
    
    /**
     * Process this field based on its template and the received data.
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */

    public function getFieldProperties() {
        // i'm not sure hwo to make the combo boxes visually display their defaultValue. i HATE extJS
        return array(
        );
    }

    public function getName() {
        $this->modx->log(modX::LOG_LEVEL_ERROR,"getName\n");
        return 'checkblock Input'; 
        // return $this->modx->lexicon('checkblock.input_name');
    }
    
    public function getDescription() {
        $this->modx->log(modX::LOG_LEVEL_ERROR,"getDescription\n");
        return 'With checkblock Input you can have checkboxes in your ContentBlocks.'; 
        // return $this->modx->lexicon('checkblock.input_description');
    }

    /**
     * @return array
     */
    public function getJavaScripts() {
        $assetsUrl = $this->modx->getOption('checkblock.assets_url', null, MODX_ASSETS_URL . 'components/checkblock/');
        $this->modx->log(modX::LOG_LEVEL_ERROR,"getJavaScripts\n");
        return array(
            $assetsUrl . 'js/inputs/checkblock.js',
        );
    }

    /**
     * @return array
     */
    public function getTemplates() {
        $this->modx->log(modX::LOG_LEVEL_ERROR,"getTemplates\n");
        $tpls = array();
        
        // Grab the template from a .tpl file
        $corePath = $this->modx->getOption('checkblock.core_path', null, MODX_CORE_PATH . 'components/checkblock/');
        $template = file_get_contents($corePath . 'templates/checkblock.tpl');
        
        // Wrap the template, giving the input a reference of "checkblock", and
        // add it to the returned array.
        $tpls[] = $this->contentBlocks->wrapInputTpl('checkblock', $template);
        return $tpls;
    }
}