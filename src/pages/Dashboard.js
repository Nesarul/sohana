import React from 'react'
import DrawerIcon from '../images/icon_files.svg'
import GsIcon from '../images/icon_getting_started.svg'
import KbIcon from '../images/icon_kb.svg'
import OrgIcon from '../images/icon_org_settings.svg'
import ProjIcon from '../images/icon_projects.svg'
function Dashboard() {
    return (
        <>
            <div className="container-fluid">
                <div className="row bg-f6 mb-5">
                    <div className="col-7">
                        <div className="row ico-img">
                            <div className="col-4 text-center">
                                <img src={ DrawerIcon } alt="icon" className="w-100" />
                            </div>
                            <div className="col-4 text-center">
                                <img src={ GsIcon } alt="icon" className="w-100" />
                            </div>
                            <div className="col-4 text-center">
                                <img src={ KbIcon } alt="icon" className="w-100" />
                            </div>
                            <div className="col-4 text-center">
                                <img src={ OrgIcon } alt="icon" className="w-100" />
                            </div>
                            <div className="col-4 text-center">
                                <img src={ DrawerIcon } alt="icon" className="w-100" />
                            </div>
                            <div className="col-4 text-center">
                                <img src={ ProjIcon } alt="icon" className="w-100" />
                            </div>
                        </div>
                    </div>
                    <div className="col-5">
                        <div className="row">
                            <div className="col nf p-3 border">
                                <h3>News Feed Here</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique neque labore sit excepturi accusantium eos quidem optio at perspiciatis corporis nihil obcaecati cupiditate cum ducimus dolorum, ipsam velit nisi dolor?</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi molestiae illo odio, dolor sint corrupti maxime animi debitis voluptates incidunt blanditiis aliquam repellendus omnis at natus optio non culpa iusto?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ducimus a velit, debitis id autem optio, voluptates minus beatae, delectus neque dolorem doloremque odit cumque. Sapiente iure libero obcaecati dolores?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique neque labore sit excepturi accusantium eos quidem optio at perspiciatis corporis nihil obcaecati cupiditate cum ducimus dolorum, ipsam velit nisi dolor?</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi molestiae illo odio, dolor sint corrupti maxime animi debitis voluptates incidunt blanditiis aliquam repellendus omnis at natus optio non culpa iusto?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ducimus a velit, debitis id autem optio, voluptates minus beatae, delectus neque dolorem doloremque odit cumque. Sapiente iure libero obcaecati dolores?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Dashboard
