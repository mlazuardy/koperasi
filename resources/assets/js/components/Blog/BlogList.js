import React from 'react';
import BlogCard from './BlogCard';

const BlogList = ({blogs,deleteBlog})=> {
    const emptyMessage = (
        <p>There is no Blog yet</p>
    )

    const list = (
            blogs.map(blog => <BlogCard deleteBlog={deleteBlog} key={blog.uuid} blog={blog}/>)
    )
    return(
        <div className="col-md-4">
        {blogs.length === 0 ? emptyMessage : list}
        </div>
    )
};
export default BlogList;