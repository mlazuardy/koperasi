export const SET_BLOGS = "SET_BLOGS";
export const ADD_BLOG = "ADD_BLOG";
export const DELETE_BLOG = "DELETE_BLOG";
export const UPDATE_BLOG = "UPDATE_BLOG";
import axios from 'axios';

export function setBlogs(blogs){
    return {
        type:SET_BLOGS,
        blogs
    };
}
export function addBlog(blog){
    return{
        type:ADD_BLOG,
        blog
    };
}

export function deletedBlog(blogUuid) {
    return {
        type: DELETE_BLOG,
        blogUuid
    };
}

export function updatedBlog(blog){
    return {
        type: UPDATE_BLOG,
        blog
    };
}

export function fetchBlogs() {
    return dispatch => {
        axios.get('/blog',{
            headers:{
                "Content-Type":'application/json',
                'Accept':'application/json'
            }
        }).then(res => dispatch(setBlogs(res.data)));
    };
}

export function deleteBlog(uuid){
    return dispatch =>{
        return axios.delete(`/blog/${uuid}`)
        .then(data => dispatch(deletedBlog(uuid))).catch(error => console.log(error.response));
    };
}

export function saveBlog(data){
    return dispatch => {
        return axios.post('/blog',data).catch(error=>{
            console.log(error.response);
        }).then(dispatch(addBlog(data)));
    };
}

export function updateBlogs(data){
    return dispatch => {
        return axios.put(`/blog/${data.uuid}`,data).then(  dispatch(updatedBlog(data)))
        .then(response=> console.log(response))
        .catch(error=>console.log(error.response));
    }
}