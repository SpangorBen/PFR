const MainClient = ({services}) => {
	return ( 
		<div className="main">
			<div className="main-header">
				<div className="main-header__title">Productivity</div>
				<div className="main-header__avatars">
					<img className="main-header__avatar" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="avatar"/>
					<img className="main-header__avatar" src="https://images.unsplash.com/photo-1683392969197-17547ac3e06e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1587&q=80" alt="avatar"/>
					<img className="main-header__avatar" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1760&q=80" alt="avatar"/>
					<button className="add-button"><svg fill="none" stroke="currentColor" strokeWidth="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
				</svg></button>
				</div>
				<button className="main-header__add">
					<svg fill="none" stroke="currentColor" strokeWidth="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
				</svg>
				</button>
			</div>
				<div className="main-header-nav">
					<a href="#" className="nav-item active">All</a>
					<a href="#" className="nav-item">Videos</a>
					<a href="#" className="nav-item">Notes</a>
					<a href="#" className="nav-item">Music</a>
					<a href="#" className="nav-item">To-do list</a>
				</div>
			<div className="main-content">
				{/* <div className="card card-img card-1 card-main"></div> */}
				{services ? (
					services.map((service) => (
					<div className="card card-img" key={service.id}>
						<h3>{service.name}</h3>
						<img src="https://plus.unsplash.com/premium_photo-1682130098765-1952715f456a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""/>
					</div>
				))) : (
					<p>Loading</p>
				)}
				<div className="card card-img">
					<img src="https://plus.unsplash.com/premium_photo-1681302987702-39acb4833fd8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MXxnZjgtZDJuOTRXNHx8ZW58MHx8fHx8" alt="" />
				</div>
			</div>
		</div>
	);
}
 
export default MainClient;