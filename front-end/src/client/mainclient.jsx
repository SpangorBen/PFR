import { useContext, useEffect, useState } from "react";
import axios from "../axios";
import Card from "./card";
import { ClientContext } from "./clientApp";


const MainClient = () => {
	const  { formatDate, token, openModal } = useContext(ClientContext);
	// const [showModal, setShowModal] = useState(false);

	const [stateClient, setState] = useState({
      services: [],
      categories: [],
	  categorySelected : ''
    });

	const fetchCategories = async () => {
		const response = await axios.get('/categories',{
		headers:{
			// Authorization: `Bearer ${token}`
		}
		});
		setState((prev)=>({
		...prev,
		categories: response.data.data
		}))
    // console.log(state.categories);
	};

	const getServices = async () => {
    const response = await axios.get('/all/services',{
      headers:{
        // Authorization: `Bearer ${token}`
      }
    });
    // console.log(response.data);
    setState((prev)=>({
      ...prev,
      services: response.data
    }))
  };

	const fetchByCategory = async (id) => {
		try {
			const response = await axios.post('/services/filterByCategory', { category_id: id });

			setState((prev) => ({
				...prev,
				services: response.data
			}));
		} catch (error) {
			console.error('Error fetching services by category:', error);
		}
	};
	// console.log(stateClient.services);

  useEffect(() => {
    getServices();
	fetchCategories();
  }, []);

	return ( 
		<>
			<div className="main-header-nav">
				<button type="button" onClick={getServices} className="nav-item active">All</button>
				{stateClient.categories ? (
					stateClient.categories.map((category) => (
						<button type="button" onClick={()=>fetchByCategory(category.id)} className="nav-item" key={category.id}>{category.name}</button>
				))) : (
					<p>Loading</p>
				)}
			</div>
			<div className="main-content">
				{stateClient.services ? (
					stateClient.services.map((service) => (
					<Card formatDate={formatDate} key={service.id} service={service} openModal={openModal}/>
				))) : (
					<p>Loading</p>
				)}
			</div>
		</>
	);
}
 
export default MainClient;