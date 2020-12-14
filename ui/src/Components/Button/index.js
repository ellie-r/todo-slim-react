import React, {Component} from 'react';

export class Button extends Component {
    render() {
        return (
            <button type="button" className="completeButton" onClick={this.props.onClick}>{this.props.buttonName}</button>
        )
    }
}