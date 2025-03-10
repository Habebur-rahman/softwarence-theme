(function(blocks,editor,element){

    var el = element.createElement;

    blocks.registerBlockType('gcab/gc-about',{
        title: 'GC About',
        icon: 'admin-comments',
        category: 'common',
        attributes: {
            title: {
                type: 'string',
                default: 'Block Title',
            },
            content: {
                type: 'string',
                default: 'Hellow World',
            },
        },
        edit: function(props){
            return (
                el('div', {className: props.className},
                    el(
                        editor.RichText,
                        {
                            tagName: 'h2',
                            className: 'gc-about-title',
                            value: props.attributes.title,
                            onChange: function (content) {
                                props.setAttributes({title:content});
                            }
                        }
                    ),
                    el(
                        editor.RichText,
                        {
                            tagName: 'div',
                            className: 'gc-about-text',
                            value: props.attributes.content,
                            onChange: function (content) {
                                props.setAttributes({content:content});
                            }
                        }
                    ),
                )
            );
        },
        save: function(props){
            return (
                el('div',{className:props.className},
                    el(editor.RichText.Content, {
                        tagName: 'h2',
                        className: 'gc-about-title',
                        value: props.attributes.title,
                    }),
                    el(editor.RichText.Content, {
                        tagName: 'div',
                        className: 'gc-about-text',
                        value: props.attributes.content,
                    }),
                )
            );
        },
    });

})(window.wp.blocks,window.wp.editor,window.wp.element);