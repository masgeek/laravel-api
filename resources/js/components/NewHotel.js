import axios from 'axios'
import React, {Component} from 'react'

class NewHotel extends Component {
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
            errors: []
        };
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.handleCreateNewProject = this.handleCreateNewProject.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
    }

    handleFieldChange(event) {
        this.setState({
            [event.target.name]: event.target.value
        })
    }

    handleCreateNewProject(event) {
        event.preventDefault();

        const {history} = this.props;

        const project = {
            name: this.state.name,
            city: this.state.city,
            state: this.state.state,
            country: this.state.country,
            zip_code: this.state.zip_code,
            phone_number: this.state.phone_number,
            email: this.state.email,
            address: this.state.address
        };

        axios.post('/api/hotels', project)
            .then(response => {
                // redirect to the homepage
                history.push('/')
            })
            .catch(error => {
                this.setState({
                    errors: error.response.data.message
                })
            })
    }

    hasErrorFor(field) {
        return !!this.state.errors[field]
    }

    renderErrorFor(field) {
        if (this.hasErrorFor(field)) {
            return (
                <span className='invalid-feedback'>
              <strong>{this.state.errors[field][0]}</strong>
            </span>
            )
        }
    }

    render() {
        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-12'>
                        <div className='card'>
                            <div className='card-header'>Add new hotel</div>
                            <div className='card-body'>
                                <form onSubmit={this.handleCreateNewProject}>

                                    <div className='row'>
                                        <div className='col-md-6'>
                                            <label htmlFor='name'>Hotel name</label>
                                            <input
                                                id='name'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('name') ? 'is-invalid' : ''}`}
                                                name='name'
                                                value={this.state.name}
                                                onChange={this.handleFieldChange}
                                            />
                                            {this.renderErrorFor('name')}
                                        </div>
                                        <div className='col-md-6'>
                                            <label htmlFor='city'>Hotel city</label>
                                            <input
                                                id='city'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('city') ? 'is-invalid' : ''}`}
                                                name='city'
                                                value={this.state.city}
                                                onChange={this.handleFieldChange}
                                            />
                                            {this.renderErrorFor('city')}
                                        </div>
                                    </div>

                                    <div className='row'>
                                        <div className='col-md-4'>
                                            <label htmlFor='state'>State</label>
                                            <input
                                                id='state'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('state') ? 'is-invalid' : ''}`}
                                                name='state'
                                                value={this.state.state}
                                                onChange={this.handleFieldChange}
                                            />
                                            {this.renderErrorFor('state')}
                                        </div>
                                        <div className='col-md-4'>
                                            <label htmlFor='city'>Country</label>
                                            <input
                                                id='country'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('country') ? 'is-invalid' : ''}`}
                                                name='country'
                                                value={this.state.country}
                                                onChange={this.handleFieldChange}
                                            />
                                            {this.renderErrorFor('country')}
                                        </div>
                                        <div className='col-md-4'>
                                            <label htmlFor='zip_code'>Zip code</label>
                                            <input
                                                id='zip_code'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('zip_code') ? 'is-invalid' : ''}`}
                                                name='zip_code'
                                                value={this.state.zip_code}
                                                onChange={this.handleFieldChange}
                                            />
                                            {this.renderErrorFor('zip_code')}
                                        </div>
                                    </div>

                                    <div className='form-group'>
                                        <label htmlFor='address'>Hotel address</label>
                                        <textarea
                                            id='address'
                                            className={`form-control ${this.hasErrorFor('address') ? 'is-invalid' : ''}`}
                                            name='address'
                                            rows='5'
                                            value={this.state.address}
                                            onChange={this.handleFieldChange}
                                        />
                                        {this.renderErrorFor('address')}
                                    </div>
                                    <button className='btn btn-primary'>Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default NewHotel
