import React, {Component} from 'react';
import {Button} from "../Button";
import './index.css';

export class TaskItem extends Component {
    constructor(props) {
        super(props);
        this.state = {hasError: ''};
    }

    render() {
        return (
            <li id={this.props.taskId}>{this.props.taskName}<Button onClick={this.props.buttonClick} buttonName="Mark As Complete"/></li>

        )
    }
}