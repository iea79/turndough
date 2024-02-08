import { useBlockProps } from '@wordpress/block-editor';
import { RawHTML } from '@wordpress/element';

export default function save(props) {
    const blockProps = useBlockProps.save();
    const { post, cover, customCover, inverse } = props.attributes;
    const coverUrl = customCover ? customCover.url : cover ? cover.source_url : '';
    return (
        <div
            {...blockProps}
            className={inverse ? 'singlePost singlePost_inverse' : 'singlePost'}
        >
            <a
                href={post?.link}
                className="singlePost__img"
            >
                {coverUrl ? (
                    <img
                        src={coverUrl}
                        alt=""
                    />
                ) : (
                    'No featured image'
                )}
            </a>
            <div className="singlePost__content">
                <h2 className="singlePost__title">{post?.title?.rendered}</h2>
                <div className="singlePost__text">
                    <RawHTML children={post?.excerpt?.rendered.replace('[&hellip;]', '...')} />
                </div>
                <a
                    href={post?.link}
                    className="singlePost__more"
                >
                    Read more
                </a>
            </div>
        </div>
    );
}
