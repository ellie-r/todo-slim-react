import React, {Component} from 'react';
import {Button} from "../Button";
import {Label} from "../Label";
import {Input} from "../Input";
import './index.css';

export class AddNewTaskForm extends Component {
    constructor(props) {
        super(props);
        this.state = ({input: '', hasError: ''});
    }

    addNewTask = (e) => {
        fetch('http://localhost:8080/addNewTask', {
            method: 'POST',
            body: JSON.stringify({"taskName": e.target.previousSibling.value}),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then( response => {
            return response.json();
        }).then( res => {
            if (res.success) {
                e.target.previousSibling.value = '';
                this.props.update();
            } else {
                this.props.setError(res.message);
            }
        }).catch( err => {
            this.props.setError('Unexpected error occurred, please try again');
        });
    }

    render() {
        return (
            <div>
                {this.state.hasError && <h3 className="error"> {this.state.hasError} </h3>}
                <form>
                    <Label />
                    <Input value={this.state.input}/>
                    <Button onClick={this.addNewTask} buttonName="Submit"/>
                </form>
            </div>
        )
    }
}