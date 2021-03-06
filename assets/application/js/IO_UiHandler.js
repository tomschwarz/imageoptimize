/**
 * UI handler file of frontend.
 *
 * @package     ImageOptimize
 * @author      Thomas Schwarz
 * @copyright   Copyright (c) 2019, Thomas Schwarz. (https://www.image-optimize.com/)
 * @license     MIT License (https://opensource.org/licenses/MIT)
 * @link        https://www.image-optimize.com/
 * @since       Version 0.1.0
 */
jQuery(document).ready(function ($)
{
    /*
    |--------------------------------------------------------------------------
    | General UI control
    |--------------------------------------------------------------------------
    */
    $(document).on('click', '.option-group--opener .form-check-input', function()
    {
        let $parent = $(this).closest('.option-group--opener');
        let $optionWrapper = $parent.next('.option-group--wrapper');

        $optionWrapper.toggle();
    });


    // Fit to size click
    $(document).on('click',  '#fitToSize', function()
    {
        $('#fitToSizeIcon').toggleClass('active fa-unlink');
    });


    // Enable 'height' input field.
    $(document).on('click', '#fitToSize', function ()
    {
        toggleDisabledProperty($('#imageHeight'));
    });


    // Enable input of group if checkbox was clicked
    $(document).on('click', '.input-group input[type=checkbox]', function()
    {
        var $parent = $(this).closest('.input-group');
        toggleDisabledProperty($parent.find('.form-control'));
    });


    // Open uploaded, optimized image in new tab.
    $(document).on('click', '#uploadedImage, #optimizedImage', function ()
    {
        var imageLink = $(this).attr('data-image');
        window.open(imageLink, '_blank');
    });


    /*
    |--------------------------------------------------------------------------
    | Helper functions
    |--------------------------------------------------------------------------
    */

    /**
     * Toggle disabled state of given jQuery element
     *
     * @param   {Object}    $element        - jQuery selector
     */
    function toggleDisabledProperty ($element)
    {
        $element.prop('disabled', function(i, v) { return !v; });
    }
});