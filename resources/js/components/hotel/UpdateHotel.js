import axios from 'axios/index'
import React, {Component} from 'react'
import {Link} from "react-router-dom";

class UpdateHotel extends Component {
    /*constructor(props) {
        super(props);
        this.state = {
            name: '',
            city: '',
            state: '',
            country: '',
            zip_code: '',
            phone_number: '',
            email: '',
            address: '',
            image: '',
            errors: []
        };
    }*/

    componentDidMount() {
        const id = this.props.match.params.id;
        console.log('Hello world'+id)
    }

    render() {
        return (
            <h1>We are here</h1>
        )
    }
}

export default UpdateHotel
