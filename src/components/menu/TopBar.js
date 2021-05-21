import React from 'react'
import { useState } from 'react';
import { Link } from 'react-router-dom';
import Logo from '../../images/main-logo.png';
import BarMenu from "../../images/bar.png";
import { SideBarData } from '../data/SideBarData';
import BannerImage from '../../images/banner.jpg'
import Dashboard from '../../pages/Dashboard';
function TopBar() {
    const [isSideBarVisible, setSideBarVisibility] = useState(1);
    const setSideBar = () => (
        setSideBarVisibility(!isSideBarVisible)
    );
    return (
        <>
            <div className="row">
                <div className="col-12 p-0">
                    
                    <div className="wrapper">
                        <nav id="sidebar" className={ isSideBarVisible ? "active":"null"}>
                            <ul className="list-unstyled">
                                { 
                                    SideBarData.map((items)=>{
                                        return(
                                            <li key={items.id}>
                                                <Link to={ items.path }>
                                                    {items.icon}
                                                    <span>{items.title}</span>
                                                </Link>
                                            </li>
                                        );
                                    })
                                }
                            </ul>
                        </nav>
                        <div id="content">
                            <nav className="navbar navbar-expand-lg navbar-light bg-custom">
                                <div className="container-fluid">
                                    <Link to="#"><img className="main-logo" src={Logo} alt="Main Logo" /></Link>
                                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span className="navbar-toggler-icon"></span>
                                    </button>
                                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li className="nav-item">
                                                <Link to="#" className="nav-link" onClick={ setSideBar }><img src={ BarMenu } alt="Bar Menu" /></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>                        
                            <div className="container-fluid">
                                <div className="row">
                                    <div className="col-12 p-0">
                                        <img src={BannerImage} alt="Banner" className="w-100" />
                                    </div>
                                </div>
                            </div>

                            <br/><br/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-12">
                                        <Dashboard />
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </>
    )
}

export default TopBar
