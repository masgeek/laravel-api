// resources/assets/js/components/App.js

import React, {Component} from 'react'
import ReactDOM from 'react-dom'
import {BrowserRouter, Route, Switch} from 'react-router-dom'
import Header from './Header'
import NewHotel from './hotel/NewHotel'
import EditHotel from './hotel/EditHotel'
import HotelsList from './hotel/HotelsList'

class Index extends Component {
    render() {
        return (
            <BrowserRouter>
                <div>
                    <Header/>
                    <Switch>
                        <Route exact path='/' component={HotelsList}/>
                        <Route path='/new-hotel' component={NewHotel}/>
                        <Route path='/view-hotel/:id' component={NewHotel}/>
                        <Route path='/edit-hotel/:id' component={EditHotel}/>
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<Index/>, document.getElementById('app'));
