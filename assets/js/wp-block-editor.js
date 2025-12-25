/*
    Plugin:  Széchenyi 2020 Logo
    Loading: WP Gutenberg Editor
*/

const registerBlockType = wp.blocks.registerBlockType;
const SelectControl = wp.components.SelectControl;
const ServerSideRender = ( wp.serverSideRender && wp.serverSideRender.ServerSideRender )
    ? wp.serverSideRender.ServerSideRender
    : ( wp.editor && wp.editor.ServerSideRender ? wp.editor.ServerSideRender : undefined );
const Fragment = wp.element.Fragment;
const __ = wp.i18n.__;

registerBlockType('szechenyi-2020/block', {
    title: __( 'Széchenyi 2020 Logo', 'szechenyi-2020' ),
    icon: 'format-image',
    category: 'common',
    attributes: {
        logoPosition: {
            type: 'string',
            default: 'bottom'
        }
    },
    edit: function edit(_ref) {
        var attributes = _ref.attributes,
            setAttributes = _ref.setAttributes;

        var logoPosition = attributes.logoPosition;

        var imageOptions = [{
            value: 'top',
            label: __( 'Style' ) + ' - ' + __( 'Top')
        }, {
            value: 'bottom',
            label: __( 'Style') + ' - ' +  __( 'Bottom')
        }];

        var onLogoPositionSelect = function onLogoPositionSelect(selectedValue) {
            setAttributes({
                logoPosition: selectedValue
            });
        };

        // Fallback (no preview) if ServerSideRender isn't available.
        if ( ! ServerSideRender ) {
            return wp.element.createElement(Fragment, null, wp.element.createElement(SelectControl, {
                label: __( 'Design'),
                value: logoPosition,
                options: imageOptions,
                onChange: onLogoPositionSelect
            }), wp.element.createElement('p', null, __( 'No data supplied.')));
        }

        return wp.element.createElement(Fragment, null, wp.element.createElement(SelectControl, {
            label: __( 'Design'),
            value: logoPosition,
            options: imageOptions,
            onChange: onLogoPositionSelect
        }), wp.element.createElement(ServerSideRender, {
            block: "szechenyi-2020/block",
            attributes: attributes
        }));
    },
    save: function save() {
        return null;
    }
});