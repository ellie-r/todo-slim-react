import React, {Component} from 'react';
import {TaskItem} from "../TaskItem";
import './index.css';

export class TaskList extends Component {
    constructor(props) {
        super(props);
        this.state = {hasError: ''};
    }

    markAsComplete = (e) => {
        let taskId = e.target.parentElement.id;
        fetch('http://localhost:8080/markAsComplete/' + taskId,
            {
                method: 'put'
            }).then(response => {
            return response.json()})
            .then( res => {
                if (res.success) {
                    this.props.setError('');
                    this.props.update();
                } else {
                    this.props.setError(res.message);
                }
            })
            .catch( err => {
                this.props.setError('Unexpected error occurred, please try again');
            })
    }

    render() {
        return (
            <div>
                {this.state.hasError && <h3 className="error"> {this.state.hasError} </h3>}
                <ul>
                    {this.props.taskList.map((task) => {
                            return <TaskItem taskName={task.name} taskId={task.id} buttonClick={this.markAsComplete} />;
                        }
                    )}
                </ul>
            </div>
        )
    }
}