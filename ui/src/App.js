import React, {Component} from 'react';
import './App.css';
import {TaskList} from "./Components/TaskList";
import {AddNewTaskForm} from "./Components/AddNewTaskForm";
import {Header} from "./Components/Header";

class App extends Component {
    constructor(props) {
        super(props);
        this.state = {taskList: [], hasError: ''};
        this.getTasks();
    }

    getTasks = () => {
        fetch('http://localhost:8080/')
            .then( res => res.json())
            .then( res => {
                if (res.success) {
                    this.setState({taskList: res.data});
                    this.setError('');
                } else {
                    this.setError(res.message);
                }
            }).catch( (e) => {
                this.setError('Unexpected error occurred, please try again');
        })
    }

    setError = (errMessage) => {
        this.setState({hasError: errMessage});
    }

    render () {
         return (
             <div className="App">
                 {this.state.hasError && <h3> {this.state.hasError} </h3>}
                <AddNewTaskForm update={this.getTasks} setError={this.setError}/>
                <Header />
                <TaskList update={this.getTasks} taskList={this.state.taskList} setError={this.setError}/>
            </div>
        )
    }
}

export default App;
