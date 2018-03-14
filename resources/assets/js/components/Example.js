import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component{
    constructor(props){
        super(props);
        this.state = {
            count:0
        };
        this.addCount = this.addCount.bind(this);
        this.substractCount = this.substractCount.bind(this);   
    }

    addCount(){
        this.setState({
            count:this.state.count + 1000
        });
    }
    substractCount(){
        this.setState({
            count:this.state.count -1000
        });
    }
    render(){
        return(
            <div className="container" >
                <div className="form-group">
                    <h1>{this.state.count}</h1>
                    <button onClick={this.addCount}  >+</button>
                    <button onClick={this.substractCount} >-</button>
                </div>
            </div>
        )
    }
}

if(document.getElementById('example-coy')){
    ReactDOM.render(<Example/>,document.getElementById('example-coy'))
}