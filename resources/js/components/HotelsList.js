// resources/assets/js/components/ProjectsList.js

import axios from 'axios'
import React, {Component} from 'react'
import {Link} from 'react-router-dom'

class HotelsList extends Component {
    constructor() {
        super()
        this.state = {
            hotels: []
        }
    }

    componentDidMount() {
        axios.get('/api/hotels').then(response => {
            this.setState({
                hotels: response.data.data
            })
        })
    }

    render() {
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
                                            to={`/${hotel.id}`}
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
}

export default HotelsList
