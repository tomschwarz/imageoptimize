<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Resize optimize rule for IO_Optimizer.
 *
 * @package     ImageOptimize
 * @author      Thomas Schwarz
 * @copyright   Copyright (c) 2019, Thomas Schwarz. (https://www.image-optimize.com/)
 * @license     MIT License (https://opensource.org/licenses/MIT)
 * @link        https://www.image-optimize.com/
 * @since       Version 0.1.0
 * @filesource
 */
class IO_OptimizeRuleResize extends IO_OptimizeRule
{
    /**
     * Width for resizing.
     *
     * @var integer
     */
    private $_width;


    /**
     * Height for resizing.
     *
     * @var integer
     */
    private $_height;


    /**
     * Determines if we should keep ratio.
     *
     * @var boolean
     */
    private $_keepRatio;


    /**
     * Callback for keeping ratio (for resize() method).
     *
     * @var callback
     */
    private $_ratioCallback;


    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->_width = NULL;
        $this->_height = NULL;
        $this->_keepRatio = TRUE;

        $this->_ratioCallback = function ($constraint)
        {
            $constraint->aspectRatio();
        };

        $this->_optionName = 'resize';
    }


    /**
     * @inheritDoc
     */
    protected function _setRuleOptions()
    {
        $options = $this->_options;
        if (isset($options['width']))
        {
            $this->_width = $options['width'];
        }

        if (isset($options['keepRatio']))
        {
            $this->_keepRatio = FALSE;
            $this->_ratioCallback = NULL;
        }

        if (isset($options['height']))
        {
            $this->_height = $options['height'];
        }
    }


    /**
     * @inheritDoc
     */
    public function execute()
    {
        if (!$this->_width)
        {
            return $this->_image;
        }

        return $this->_image->resize(
            $this->_width,
            $this->_height,
            $this->_ratioCallback
        );
    }


    /**
     * Set specific validation rules.
     *
     * @param   {CI_Form_validation}    $validator      - Client side validator
     */
    public static function setValidationRules($validator)
    {
        $validator->set_rules('resize[active]', 'Change image dimensions', 'in_list[on]|trim|strip_tags');
        $validator->set_rules('resize[width]', 'Width', 'numeric|trim|strip_tags');
        $validator->set_rules('resize[keepRatio]', 'Width', 'in_list[on]|trim|strip_tags');
        $validator->set_rules('resize[height]', 'Width', 'numeric|trim|strip_tags');
    }
}
