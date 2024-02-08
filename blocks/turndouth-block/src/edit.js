import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { SelectControl, CheckboxControl, Button, PanelBody } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { RawHTML } from '@wordpress/element';
import './editor.css';

const ALLOWED_MEDIA_TYPES = ['image'];

export default function Edit({ attributes, setAttributes }) {
    const { post, cover, customCover, inverse, postId } = attributes;
    const instructions = <p>{__('To edit the post image, you need permission to upload media.', 'image-selector-example')}</p>;
    const blockProps = useBlockProps({
        className: 'wp-block-fullwidth',
    });
    const coverUrl = customCover ? customCover.url : cover ? cover.source_url : '';

    const { posts } = useSelect((select) => {
        const { getEntityRecords } = select('core');

        // Query args
        const query = {
            status: 'publish',
            per_page: -1,
        };

        return {
            posts: getEntityRecords('postType', 'post', query),
        };
    });

    // populate options for <SelectControl>
    const options = [];
    if (posts) {
        options.push({ value: 0, label: 'Select a post' });
        posts.forEach((page) => {
            options.push({ value: page.id, label: page.title.rendered });
        });
    } else {
        options.push({ value: 0, label: 'Loading...' });
    }

    if (postId) {
        const selectedPost = posts?.filter((e) => e.id === postId)[0];
        if (selectedPost) {
            setAttributes({ post: selectedPost });
        } else {
            setAttributes({ post: null });
        }
    } else {
        setAttributes({ post: null });
    }

    if (customCover) {
        setAttributes({ cover: null });
    } else {
        const media = useSelect((select) => select('core').getMedia(post?.featured_media));
        setAttributes({ cover: media });
    }

    const onUpdateImage = (image) => {
        console.log(image);
        setAttributes({
            customCover: image,
        });
    };

    return (
        <div {...blockProps}>
            <InspectorControls>
                <PanelBody
                    title={__('Single post block settings')}
                    initialOpen={true}
                >
                    <SelectControl
                        label={__('Select post:')}
                        value={postId}
                        onChange={(e) => setAttributes({ postId: isNaN(+e) ? null : +e })}
                        options={options}
                        __nextHasNoMarginBottom
                    />
                    <CheckboxControl
                        label={__('Inverse block')}
                        checked={inverse}
                        onChange={(e) => setAttributes({ inverse: e })}
                    />
                    {/* <MediaUploadCheck fallback={instructions}>
                        {coverUrl ? (
                            <img
                                src={coverUrl}
                                alt=""
                            />
                        ) : (
                            <p>No featured image</p>
                        )}
                        <MediaUpload
                            title={__('Post image')}
                            onSelect={onUpdateImage}
                            allowedTypes={ALLOWED_MEDIA_TYPES}
                            value={customCover?.id}
                            render={({ open }) => (
                                <Button
                                    // className={'editor-post-featured-image__toggle'}
                                    onClick={open}
                                >
                                    {__('Edit post image')}
                                </Button>
                            )}
                        />
                    </MediaUploadCheck> */}
                </PanelBody>
            </InspectorControls>
            {post ? (
                <div className={inverse ? 'singlePost singlePost_inverse' : 'singlePost'}>
                    <div className="singlePost__img">
                        {coverUrl ? (
                            <img
                                src={coverUrl}
                                alt=""
                            />
                        ) : (
                            'No featured image'
                        )}
                    </div>
                    <div className="singlePost__content">
                        <h2 className="singlePost__title">{post.title.rendered}</h2>
                        <div className="singlePost__text">
                            <RawHTML children={post.excerpt.rendered.replace('[&hellip;]', '...')} />
                        </div>
                        <a
                            href={post.link}
                            className="singlePost__more"
                        >
                            Read more
                        </a>
                    </div>
                </div>
            ) : (
                <div className="singlePost__empty">Select post to display</div>
            )}
        </div>
    );
}
