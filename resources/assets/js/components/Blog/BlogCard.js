import React from 'react';
import {connect } from 'react-redux';
import {updateBlogs} from './actions/blog-action';

class BlogCard extends React.Component{
    constructor(props){
        super(props);
        this.state={
            uuid:this.props.blog.uuid,
            title:this.props.blog.title,
            body:this.props.blog.body
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }
    handleChange(e){
        this.setState({
            [e.target.name]:e.target.value
        });
    }
    handleSubmit(e){
        e.preventDefault();
        const updateItem = {
            uuid:this.state.uuid,
            title:this.state.title,
            body:this.state.body
        };
        this.props.updateBlogs(updateItem).catch(error => console.log(error.response));
    }
    render(){
        const {blog,deleteBlog} = this.props;
        return(
            <div className="card">
                <div className="card-body">
                    <h2 className="card-title">{blog.title}</h2>
                    <div className="btn btn-danger" onClick={() => deleteBlog(blog.uuid)} >Delete</div>
                    <button className="btn btn-primary" data-toggle="modal" data-target={`#blog-modal-${blog.id}`}>Edit</button>

                    <div className="modal fade" id={`blog-modal-${blog.id}`} tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div className="modal-dialog" role="document">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <h5 className="modal-title" id="exampleModalLabel">{blog.title}</h5>
                                    <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form onSubmit={this.handleSubmit} >
                                    <input type="hidden" name="_method" value="PUT"/>
                                    <input type="hidden" name="_token" value={window.App.csrfToken} />
                                <div className="modal-body">
                                   
                                        <div className="form-group">
                                            <label htmlFor="title">{blog.title}</label>
                                            <input type="text" name="title" onChange={this.handleChange} value={this.state.title} className="form-control" />
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="body">{blog.body}</label>
                                            <input type="text" name="body" onChange={this.handleChange} value={this.state.body} />
                                        </div>
                                 
                                </div>
                                <div className="modal-footer">
                
                                    <button className="btn btn-primary" >Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default connect(null,{updateBlogs})(BlogCard);