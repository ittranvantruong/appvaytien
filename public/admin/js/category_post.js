// $('#sortable').sortable({

//     animation: 150 // default: 0

// });
// $('#sortable li').on('DOMSubtreeModified', function() {
//     var data = $('#sortable li').map(function() {
//         return $(this).index();
//     }).get();
//     // $(this).find('li').each(function() {
//     //     $("p:eq(1)")
//     // })
//     $.each(data, function(index, value) {
//         $('#sortable li:eq(' + value + ')').remove();
//     });


//     console.log(data);

// });
$('#sortable').sortable({
    // name: String — group name
    // pull: true|false|["foo", "bar"]|'clone'|function — ability to move from the list. clone — copy the item, rather than move. Or an array of group names which the elements may be put in. Defaults to true.
    // put: true|false|["baz", "qux"]|function — whether elements can be added from other lists, or an array of group names from which elements can be added.
    // revertClone: boolean — revert cloned element to initial position after moving to a another list.
    group: "name", // or { name: "...", pull: [true, false, 'clone', array], put: [true, false, array] }

    // enable sorting
    sort: true,

    // time to wait before the sorting should start
    delay: 0,

    // enable delay on touch
    delayOnTouchOnly: false,

    // how many pixels the point should move before cancelling a delayed drag event
    touchStartThreshold: 0,

    // disables the sortable if set to true.
    disabled: false,

    // which items inside the element should be draggable
    draggable: '>*',

    // save and restore the sort.
    store: null,

    // animation speed
    animation: 0,

    // easing function: "cubic-bezier(1, 0, 0, 1)"
    easing: null,

    // drag handle
    handle: ".my-handle",

    // elements to ignore
    ignore: 'a, img',

    // filter selector
    filter: ".ignore-elements",

    // preverntDefault when filtering
    preventOnFilter: true,

    // drop placeholder
    ghostClass: "sortable-ghost",

    // chosen class
    chosenClass: "sortable-chosen",

    // dragging class
    dragClass: "sortable-drag",

    // default data attribute
    dataIdAttr: 'data-id',

    // enable drop bubble
    dropBubble: true,

    // threshold of the swap zone
    swapThreshold: 1,

    // invert swap
    invertSwap: false,

    // threshold of the inverted swap zone
    invertedSwapThreshold: 1,

    // will be detected automatically if not given
    direction: 'horizontal',

    // ignore the HTML5 DnD behaviour
    forceFallback: false,

    // fallback class
    fallbackClass: "sortable-fallback",

    // appends the cloned DOM Element into the document body
    fallbackOnBody: false,

    // how far the mouse should move before it's considered as a drag.
    fallbackTolerance: 0,

    // fallback offsets
    fallbackOffset: {
        x: 0,
        y: 0
    },

    dragoverBubble: false,

    // remove the cloned element when it is not showing
    removeCloneOnHide: true,

    // distance mouse must be from empty sortable to insert drag element into it
    emptyInsertThreshold: 5, // px, 


    // Element is chosen
    onChoose: function( /**Event*/ evt) {
        evt.oldIndex; // element index within parent
        console.log('ss');
    },

    // Element is unchosen
    onUnchoose: function( /**Event*/ evt) {
        // same properties as onEnd
    },

    // Element dragging started
    onStart: function( /**Event*/ evt) {
        evt.oldIndex; // element index within parent
    },

    // Element dragging ended
    onEnd: function( /**Event*/ evt) {
        var itemEl = evt.item; // dragged HTMLElement
        evt.to; // target list
        evt.from; // previous list
        evt.oldIndex; // element's old index within old parent
        evt.newIndex; // element's new index within new parent
        evt.clone // the clone element
        evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving
        var data = $('#sortable').find('li').map(function() {
            return $(this).index();
        }).get();
        // $(this).find('li').each(function() {
        //     $("p:eq(1)")
        // })
        console.log(data)
        $.each(data, function(index, value) {
            // $('#sortable').find('li:eq(' + value + ') .order-number').text(value + 1);
            updateSortable($('#sortable').find('li:eq(' + value + ')'));

        });
        $.toast({
            heading: 'Thành công',
            text: 'Đã lưu thứ tự danh mục mới',
            position: 'top-right',
            icon: 'success'
        });
    },

    // Element is dropped into the list from another list
    onAdd: function( /**Event*/ evt) {
        // same properties as onEnd
    },

    // Called by any change to the list (add / update / remove)
    onSort: function( /**Event*/ evt) {
        // same properties as onEnd
    },

    // Element is removed from the list into another list
    onRemove: function( /**Event*/ evt) {
        console.log('remove')
            // same properties as onEnd
    },

    // Attempt to drag a filtered element
    onFilter: function( /**Event*/ evt) {
        var itemEl = evt.item; // HTMLElement receiving the `mousedown|tapstart` event.
    },

    // Event when you move an item in the list or between lists
    onMove: function( /**Event*/ evt, /**Event*/ originalEvent) {
        // Example: https://jsbin.com/nawahef/edit?js,output
        evt.dragged; // dragged HTMLElement
        evt.draggedRect; // DOMRect {left, top, right, bottom}
        evt.related; // HTMLElement on which have guided
        evt.relatedRect; // DOMRect
        evt.willInsertAfter; // Boolean that is true if Sortable will insert drag element after target by default
        originalEvent.clientY; // mouse position
        // return false; — for cancel
        // return -1; — insert before target
        // return 1; — insert after target
    },

    // Called when creating a clone of element
    onClone: function( /**Event*/ evt) {
        var origEl = evt.item;
        var cloneEl = evt.clone;
    },

    // Called when dragging element changes position
    onChange: function( /**Event*/ evt) {
        evt.newIndex // most likely why this event is used is to get the dragging element's current index
            // same properties as onEnd
    }

}).on('click', '.sortable-delete', function() {
    var actionUrl = $(this).data('url');
    if (confirm("Xác nhận xóa danh mục?") == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: actionUrl,
                type: 'DELETE',
                data: {},
            })
            .fail(function(data) {
                console.log(data);
                $.each(data.responseJSON.message, function(key, value) {
                    toastr.error(value, {
                        timeOut: 5000
                    })
                });

            })
            .done(function(response) {

                $.toast({
                    heading: 'Thành công',
                    text: 'Đã xóa danh mục',
                    position: 'top-right',
                    icon: 'success'
                });
            });
        $(this).closest('li').remove();


    }

});

function updateSortable(e) {

    var actionUrl = $('#sortable').data('url');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
            url: actionUrl,
            type: 'PUT',
            data: {
                index: e.index() + 1,
                id: e.data('id'),
            },
        })
        .fail(function(data) {
            console.log(data);
            $.each(data.responseJSON.message, function(key, value) {
                toastr.error(value, {
                    timeOut: 5000
                })
            });

        })
        .done(function(response) {

        });

}