import {SET_BLOGS,ADD_BLOG,DELETE_BLOG} from '../actions/blog-action';

export default function blogs( state=[],action={} ){
    switch(action.type){
    case SET_BLOGS:
        return action.blogs;
    case ADD_BLOG:
        return [
            ...state,action.blog
        ];
    case DELETE_BLOG:
        return state.filter(item => item.uuid !== action.blogUuid);
    default:
        return state;
    }
}