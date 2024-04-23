import ProjectBox from './projectBox';

function ProjectsSection({ isListView, onViewToggle, services, fetchData }) {

  const handleViewClick = (view) => {
    onViewToggle(view);
  };

  return (
    <div className="projects-section">
      <div className="projects-section-header">
        <p>Projects</p>
        <p className="time">December, 12</p>
      </div>
      <div className="projects-section-line">
        <div className="projects-status">
          <div className="item-status">
            <span className="status-number">45</span>
            <span className="status-type">Services</span>
          </div>
          <div className="item-status">
            <span className="status-number">24</span>
            <span className="status-type">Live Reservations</span>
          </div>
          <div className="item-status">
            <span className="status-number">62</span>
            <span className="status-type">Total Reservations</span>
          </div>
        </div>
        <div className="view-actions">
          <button className="view-btn list-view" title="List View" onClick={() => handleViewClick('list')}>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"
                                strokeLinecap="round" strokeLinejoin="round" className="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6" />
                                <line x1="8" y1="12" x2="21" y2="12" />
                                <line x1="8" y1="18" x2="21" y2="18" />
                                <line x1="3" y1="6" x2="3.01" y2="6" />
                                <line x1="3" y1="12" x2="3.01" y2="12" />
                                <line x1="3" y1="18" x2="3.01" y2="18" />
                            </svg>
          </button>
          <button className={`view-btn grid-view ${isListView ? '' : 'active'}`} title="Grid View" onClick={() => handleViewClick('grid')}>
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"
                                strokeLinecap="round" strokeLinejoin="round" className="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7" />
                                <rect x="14" y="3" width="7" height="7" />
                                <rect x="14" y="14" width="7" height="7" />
                                <rect x="3" y="14" width="7" height="7" />
                            </svg>
          </button>
        </div>
      </div>

      {isListView ? (
        <div className="project-boxes jsListView">
          {services.map((service) => (
            <ProjectBox key={service.id} service={service} fetchData={fetchData}/>
          ))}
        </div>
      ) : (
        <div className="project-boxes jsGridView">
          {services.map((service) => (
            // <div className="project-box-wrapper" key={service.id}>
              <ProjectBox key={service.id} service={service} fetchData={fetchData} />
            // </div>
          ))}
        </div>
      )}
    </div>
  );
}

export default ProjectsSection;