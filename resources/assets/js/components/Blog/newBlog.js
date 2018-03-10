import React from 'react';
import uuid from 'uuid';
import {connect} from 'react-redux';
import {saveBlog} from './actions/blog-action'; 

class NewBlog extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            title:'',
            body:'',
            uuid:null,
            isLoading:false,
            done:false,
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
        const newBlog = {
            title:this.state.title,
            body:this.state.body,
            uuid:uuid()
        };
        this.setState({isLoading:true});
        this.props.saveBlog(newBlog).then(
            () => {this.setState({
                done:true,
                title:'',
                body:''
            })}
        )
        
    }
    render(){
        return(
            <div className="col-md-7" >
                <h2>New Blog</h2>
                <form onSubmit={this.handleSubmit} >
                <input type="hidden" name="_token" value={window.App.csrfToken} />
                    <div className="form-group">
                        <label htmlFor="title">Title</label>
                        <input type="text" onChange={this.handleChange}  value={this.state.title} name="title" className="form-control" />
                    </div>
                    <div className="form-group">
                        <label htmlFor="body">Body</label>
                        <textarea name="body" className="form-control" onChange={this.handleChange} value={this.state.body} cols="30" rows="10"></textarea>
                    </div>
                    <button className="btn btn-primary">{this.state.isLoading && this.state.done == false ? "Saving..." :"Save" }</button>
                </form>
            </div>
        )
    }
}
export default connect(null,{saveBlog})(NewBlog);