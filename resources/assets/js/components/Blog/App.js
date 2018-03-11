import React, { Component } from 'react';
import {connect} from 'react-redux';
import BlogList from './BlogList';
import {fetchBlogs,deleteBlog} from './actions/blog-action';
import NewBlog from './newBlog';

class App extends Component {
    componentDidMount() {
        this.props.fetchBlogs();
    }
    render() {
        return (
            <div className="container">
                <div className="row">
                    <BlogList deleteBlog={this.props.deleteBlog} blogs={this.props.blogs} />
                    <NewBlog  />
                </div>
              
            </div>
        );
    }
}
function mapStateToProps(state){
    return{
        blogs:state.blogs
    }
}
export default connect(mapStateToProps,{ fetchBlogs, deleteBlog })(App); 

