import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component{
    render(){
        return(
            <div>
                <h1>Laravel React Redux : Commit-Cyber</h1>
            </div>
        )
    }
}

if(document.getElementById('example-coy')){
    ReactDOM.render(<Example/>,document.getElementById('example-coy'))
}