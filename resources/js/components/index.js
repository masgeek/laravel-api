// resources/assets/js/components/App.js

import React, {Component} from 'react'
import ReactDOM from 'react-dom'
import {BrowserRouter, Route, Switch} from 'react-router-dom'
import Header from './Header'
import NewHotel from './hotel/NewHotel'
import UpdateHotel from './hotel/UpdateHotel'
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
                        <Route path='/update-hotel/:id' component={UpdateHotel}/>
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<Index/>, document.getElementById('app'));
