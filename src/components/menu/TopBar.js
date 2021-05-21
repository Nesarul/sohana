import React from 'react'
import { Link } from 'react-router-dom';
import Logo from '../../images/main-logo.png';
function TopBar() {
    return (
        <>
            <div className="row">
                <div className="col-12 p-0">
                    <div className="wrapper">
                        <nav id="sidebar">
                            <ul class="lisst-unstyled components">
                                <li><Link to="#">Contact</Link></li>
                                <li><Link to="#">About</Link></li>
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
                                            {/* <li className="nav-item"><Link to="#" className="nav-link active">Home</Link></li>
                                            <li className="nav-item"><Link to="#" className="nav-link" href="#">Link</Link></li> */}
                                            <li className="nav-item"><Link to="#" className="nav-link" href="#">Link</Link></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>                        
                    
                            <br/><br/>
                            <h1>Collapsible Bootstrap Sidebar Navigation Example</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero ipsum cumque nemo architecto laboriosam perspiciatis consequatur atque quidem vel excepturi distinctio recusandae reprehenderit vitae, libero unde ea temporibus quaerat animi ducimus ratione esse? Aspernatur magnam facere suscipit vitae itaque maxime quo amet officiis animi, harum et inventore delectus nihil cumque!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni sit nostrum aliquid mollitia optio veniam at excepturi vitae sint laudantium fugit ratione molestias, doloremque cumque eaque eligendi nobis quia. Labore officiis quisquam officia dolore! Eos labore, alias, voluptatem maxime sunt culpa dolorum at quam architecto impedit cupiditate quis ipsum odit, necessitatibus accusantium quod quo molestias enim laboriosam! Maiores facere accusamus repellat saepe enim omnis perspiciatis dolor, cupiditate ex doloremque laudantium similique sunt quisquam! Quaerat, facere ipsum natus officia cupiditate repellendus.</p>
                            
                            <div class="line"></div>
                            <h3>Lorem Ipsum</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione voluptas consequuntur laboriosam quia vero corporis, officiis, dolore natus iste incidunt animi dolor porro accusamus similique aut, facilis architecto quas? Assumenda mollitia error vel blanditiis perferendis quis sequi deleniti repellat laboriosam!</p>

                        </div>                        
                    </div>
                </div>
            </div>
        </>
    )
}

export default TopBar
