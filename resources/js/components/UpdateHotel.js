import axios from 'axios'
import React, {Component} from 'react'
import {Link} from "react-router-dom";

class UpdateHotel extends Component {
    constructor(props) {
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
    }
}

export default UpdateHotel
