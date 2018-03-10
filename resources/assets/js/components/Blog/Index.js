import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import {createStore,applyMiddleware} from 'redux';
import thunk from 'redux-thunk';
import { composeWithDevTools } from 'redux-devtools-extension';
import App from './App';
import rootReducer from '../rootReducers/rootReducer';
import {Provider} from 'react-redux';

const store = createStore(
    rootReducer,
    composeWithDevTools(
        applyMiddleware(thunk)
    )
);

if(document.getElementById('blog-index-redux')){
    ReactDOM.render(
        <Provider store={store}>
            <App />
        </Provider>,
        document.getElementById('blog-index-redux')
    )
}