import * as BsI from "react-icons/bs"
import gs from '../../images/icon_getting_started.svg'
import pj from '../../images/icon_projects.svg'
import fl from '../../images/icon_files.svg'
import mt from '../../images/icon_meetings.svg'
import og from '../../images/icon_org_settingss.svg'
import kb from '../../images/icon_kb.svg'
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
        "icon":<img src={gs} alt="l"/>
    },
    {
        "id":"03",
        "title":"Projects",
        "path":"/projects",
        "icon":<img src={pj} alt="l"/>
    },
    {
        "id":"04",
        "title":"Files",
        "path":"/files",
        "icon":<img src={fl} alt="l"/>
    },
    {
        "id":"05",
        "title":"Meetings",
        "path":"/meeting",
        "icon":<img src={mt} alt="l"/>
    },
    {
        "id":"06",
        "title":"Organization",
        "path":"/orgs",
        "icon":<img src={og} alt="l"/>
    },
    {
        "id":"07",
        "title":"Knowledge Check",
        "path":"/ks",
        "icon":<img src={kb} alt="l"/>
    }
];