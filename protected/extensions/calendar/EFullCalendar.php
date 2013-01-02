<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EFullCalendar
 *
 * @author nurcahyo
 */
class EFullCalendar extends CWidget {

    private $_asset;
    public $htmlOptions = array();
    private $_options;
    public $onMouseOver = null;
    public $onMouseOut = null;
    public $data;
    public $multipleEvent = false;

    public function preInit() {
        if ($this->onMouseOut !== null) {
            $this->_options = CMap::mergeArray($this->_options, array('eventMouseout' => $this->onMouseOut));
        }
        if ($this->onMouseOver !== null) {
            $this->_options = CMap::mergeArray($this->_options, array('eventMouseover' => $this->onMouseOver));
        }
        if ($this->data !== null) {
            $this->_options = CMap::mergeArray($this->_options, array($this->multipleEvent ? 'eventSources' : 'events' => $this->data));
        }
    }

    public function init() {
        $this->preInit();
        $this->registerClientScript();
    }

    public function registerClientScript() {
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        if (YII_DEBUG)
            $cs->registerScriptFile($this->asset . '/fullcalendar/fullcalendar.js');
        else
            $cs->registerScriptFile($this->asset . '/fullcalendar/fullcalendar.min.js');
        $cs->registerCssFile($this->asset . '/fullcalendar/fullcalendar.css');
        $cs->registerCssFile($this->asset . '/fullcalendar/fullcalendar.print.css');
        $cs->registerScript('#' . $this->id . '_' . __CLASS__, <<<EOD
 $('#$this->id').fullCalendar({$this->options});
EOD
                , CClientScript::POS_READY);
    }

    public function getAsset() {
        if ($this->_asset === null) {
            $this->setAsset(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
        }
        return $this->_asset;
    }

    public function setAsset($path) {
        $asset = Yii::app()->getAssetManager();
        $this->_asset = $asset->publish($path);
    }

    public function setOptions($options) {
        $this->_options = $options;
    }

    public function getOptions() {

        if ($this->_options === null) {
            $this->setOptions(array());
        }

        return CJavaScript::encode($this->_options);
    }

    public function run() {
        echo CHtml::openTag('div', CMap::mergeArray(array('id' => $this->id), $this->htmlOptions));
        echo CHtml::closeTag('div');
    }

}

?>
