// resources/assets/js/components/ProjectsList.js

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
                    <td>{index+1}</td>
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
                        <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                            Add new hotel
                        </Link>
                    </td>
                </tr>
            )
        })
    }

    renderOld() {
        const {hotels} = this.state;
        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>All hotels</div>
                            <div className='card-body'>
                                <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                                    Add new hotel
                                </Link>
                                <ul className='list-group list-group-flush'>
                                    {hotels.map(hotel => (
                                        <Link
                                            className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                                            to={`/update/${hotel.id}`}
                                            key={hotel.id}
                                        >
                                            {hotel.name}
                                            <span className='badge badge-primary badge-pill'>
                            {hotel.zip_code}
                          </span>
                                        </Link>
                                    ))}

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }

    render() {
        return (
            <div>
                <h1 id='title'>Hotel list</h1>
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
                        <th>Actions</th>
                    </tr>
                    {this.renderTableData()}
                    </tbody>
                </table>
            </div>
        )
    }
}

export default HotelsList
