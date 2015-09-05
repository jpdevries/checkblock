// Wrap your stuff in this module pattern for dependency injection
(function ($, ContentBlocks) {
    // Add your custom input to the fieldTypes object as a function
    // The dom variable contains the injected field (from the template)
    // and the data variable contains field information, properties etc.
    ContentBlocks.fieldTypes.checkblock = function(dom, data) {
        var input = {
            // Some optional variables can be defined here
        };
        
        // Do something when the input is being loaded
        input.init = function() {
            $(dom.find('#checkblock_' + data.generated_id)).prop('checked', data.value);
        }
        
        // Get the data from this input, it has to be a simple object.
        input.getData = function() {
            return {
                value:$(dom.find('#checkblock_' + data.generated_id)).is(':checked')
            }
        }
        
        // Always return the input variable.
        return input;
    }
})(vcJquery, ContentBlocks);