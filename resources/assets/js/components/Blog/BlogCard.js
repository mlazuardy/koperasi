import React from 'react';

const BlogCard = ({blog, deleteBlog})=>(
    <div className="card">
        <div className="card-body">
            <h2 className="card-title">{blog.title}</h2>
            <div className="btn btn-danger" onClick={()=> deleteBlog(blog.uuid)} >Delete</div>
            <a href="#" className="btn btn-primary">Edit</a>
        </div>
    </div>
)

export default BlogCard;