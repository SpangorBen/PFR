const Sidebar = ({getUser}) => {
	const user = getUser();
	return ( 
		<div className="sidebar">
			<div className="user">
				<img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2360&q=80" alt="user photo" className="user-photo"/>
				<div className="user-name">{user.name}</div>
				<div className="user-mail">{user.email}</div>
			</div>
			<div className="sidebar-menu">
				<a href="#" className="sidebar-menu__link active">Services</a>
				<a href="#" className="sidebar-menu__link">Reservations</a>
				<a href="#" className="sidebar-menu__link">Rewards</a>
				<a href="#" className="sidebar-menu__link">Profile</a>
				{/* <a href="#" className="sidebar-menu__link">Book</a>
				<a href="#" className="sidebar-menu__link">Snack</a> */}
			</div>
			<label className="toggle">
			<input type="checkbox"/>
			<span className="slider"></span>
			</label>
		</div>
	);
}
 
export default Sidebar;