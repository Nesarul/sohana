import * as BsI from "react-icons/bs"
import gs from '../../images/icon_getting_notext.png'
import pj from '../../images/icon_projects_notext.png'
import fl from '../../images/icon_files_notext.png'
import mt from '../../images/icon_meetings_notext.png'
import og from '../../images/icon_org_settings_notext.png'
import kb from '../../images/icon_org_kb_notext.png'
export const SideBarData = 
[
    {
        "id":"01",
        "title":"Home",
        "path":"/",
        "icon":<BsI.BsHouseDoor/>
    },
    {
        "id":"02",
        "title":"Getting Started",
        "path":"/gs",
        "icon":<img className="sb-icon" src={gs} alt="l"/>
    },
    {
        "id":"03",
        "title":"Projects",
        "path":"/projects",
        "icon":<img className="sb-icon" src={pj} alt="l"/>
    },
    {
        "id":"04",
        "title":"Files",
        "path":"/files",
        "icon":<img className="sb-icon" src={fl} alt="l"/>
    },
    {
        "id":"05",
        "title":"Meetings",
        "path":"/meeting",
        "icon":<img className="sb-icon" src={mt} alt="l"/>
    },
    {
        "id":"06",
        "title":"Organization",
        "path":"/orgs",
        "icon":<img className="sb-icon" src={og} alt="l"/>
    },
    {
        "id":"07",
        "title":"Knowledge Check",
        "path":"/ks",
        "icon":<img className="sb-icon" src={kb} alt="l"/>
    }
];