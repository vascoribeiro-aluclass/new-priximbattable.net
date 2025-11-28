/**
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 * 
 * @author    Carlos Ucha
 * @copyright 2010-2100 Carlos Ucha
 * @license   see file: LICENSE.txt
 * This program is not free software and you can't resell and redistribute it
 *
 * CONTACT WITH DEVELOPER
 * carlosucha92@gmail.com
 */
jQuery(document).ready(function($) {
    // Array of dependent field names (input names)
    var dependentFields = [
        "GPTCHATBOX_PRODUCTS_NAME",
        "GPTCHATBOX_PRODUCTS_REFERENCE",
        "GPTCHATBOX_PRODUCTS_PRICE",
        "GPTCHATBOX_PRODUCTS_DESCRIPTION",
        "GPTCHATBOX_PRODUCTS_URL",
        "GPTCHATBOX_PRODUCTS_SHORTDESCRIPTION"
    ];

    /**
     * Toggles the visibility of dependent fields based on the main switch state
     * @param {boolean} isEnabled - Indicates if the main switch is enabled
     */
    function toggleDependentFields(isEnabled) {
        dependentFields.forEach(function(fieldName) {
            var $fieldInput = $("[name='" + fieldName + "']");
            
            if ($fieldInput.length) {

                // Attempt to find the closest form-group or equivalent container
                var $formGroup = $fieldInput.closest(".form-group, .form-row, .field-container");

                if ($formGroup.length) {
                    if (isEnabled) {
                        $formGroup.slideDown(); // Smooth transition
                    } else {
                        $formGroup.slideUp(); // Smooth transition
                    }
                } else {
                    console.warn("Form group not found for:", fieldName); // Warning
                    // As a fallback, hide/show the input directly
                    if (isEnabled) {
                        $fieldInput.closest("div, span").slideDown();
                    } else {
                        $fieldInput.closest("div, span").slideUp();
                    }
                }
            } else {
                console.warn("Input not found for:", fieldName); // Warning
            }
        });
    }

    /**
     * Initializes the visibility of dependent fields on page load
     */
    function initializeToggle() {
        var isEnabled = $("input[name='GPTCHATBOX_PRODUCTS_FEED'][value='1']").is(":checked");
        toggleDependentFields(isEnabled);
        
        // Loop through each field and add class to the parent .form-group
        dependentFields.forEach(function(fieldName) {
        $("input[name='" + fieldName + "']").each(function() {
            $(this).closest('.form-group').addClass('toggleProductOption');
        });
    });
    }

    /**
     * Event handler for changes to the main switch
     */
    function setupEventListeners() {
        $("input[name='GPTCHATBOX_PRODUCTS_FEED']").on("change", function() {
            var newState = $(this).val(); // '1' or '0'
            var isChecked = (newState === "1");

            // Toggle dependent fields based on the new state
            toggleDependentFields(isChecked);
        });
    }

    // Initialize the toggle state on page load
    initializeToggle();

    // Set up event listeners for the main switch
    setupEventListeners();

    // Additional Debugging: Check for the existence of dependent fields
    dependentFields.forEach(function(fieldName) {
        var $fieldInput = $("[name='" + fieldName + "']");
        if (!$fieldInput.length) {
            console.error("Dependent field input not found:", fieldName); // Error
        }
    });
});
