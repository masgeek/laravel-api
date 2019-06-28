// resources/assets/js/components/HotelsList.js

import axios from 'axios'
import React, {Component} from 'react'
import {Link} from 'react-router-dom'

class HotelsList extends Component {
    constructor() {
        super()
        this.state = {
            hotels: [
                {
                    id: '',
                    name: '',
                    address: '',
                    city: '',
                    state: '',
                    country: '',
                    zip_code: '',
                    phone_number: '',
                    email: '',
                    image: ''
                }
            ]
        }
    }

    componentDidMount() {
        axios.get('/api/hotels').then(response => {
            this.setState({
                hotels: response.data.data
            })
        })
    }

    renderTableHeader() {
        const {hotels} = this.state;
        let header = Object.keys(hotels[0])
        return header.map((key, index) => {
            return <th key={index}>{key.toUpperCase()}</th>
        })
    }

    renderTableData() {
        const {hotels} = this.state;
        return hotels.map((hotel, index) => {
            const {id, name, address, city, state, country, zip_code, phone_number, email, image, created_at, updated_at} = hotel; //destructuring
            return (
                <tr key={id}>
                    <td>{index + 1}</td>
                    <td>{name}</td>
                    <td>{address}</td>
                    <td>{city}</td>
                    <td>{state}</td>
                    <td>{country}</td>
                    <td>{zip_code}</td>
                    <td>{phone_number}</td>
                    <td>{email}</td>
                    <td>
                        <img src={image} alt={name} className='img img-thumbnail' width='128px'/>
                    </td>
                    <td>
                        <Link to={`/view-hotel/${id}`} className='btn btn-success btn-sm mb-3'>View hotel</Link>
                    </td>
                    <td>
                        <Link to={`/edit-hotel/${id}`} className='btn btn-primary btn-sm mb-3'>Edit hotel</Link>

                    </td>
                    <td>
                        <Link to={`/delete-hotel/${id}`} className='btn btn-danger btn-sm mb-3'>Delete hotel</Link>
                    </td>
                </tr>
            )
        })
    }

    render() {
        return (
            <div className='col-md-12'>
                <h1 id='title'>Hotel list</h1>
                <Link className='btn btn-primary btn-md mb-3' to='/new-hotel'>
                    Add new hotel
                </Link>
                <table id='hotels' className='table table-bordered table-striped table-hover table-condensed'>
                    <tbody>
                    <tr>
                        <th>#</th>
                        <th>Hotel name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Zip code</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th colSpan={3}>Actions</th>
                    </tr>
                    {this.renderTableData()}
                    </tbody>
                </table>
            </div>
        )
    }
}

export default HotelsList
