import { useState } from 'react';
import axios from '../axios';

const ServiceForm = ({categories, fetchData}) => {
    const [formData, setFormData] = useState({
        name: '',
        description: '',
        price: '',
        category_id: '',
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({
            ...formData,
            [name]: value
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post('/services', formData, {
                headers: {
                    Authorization: `Bearer ${sessionStorage.getItem('token')}`
                }
            });
            fetchData();
            console.log(response);
            
        } catch (error) {
            console.error('Service creation failed!', error.response.data);
        }
        // console.log(formData);
    };

    return (
        <div className="messages-section">
            <div className="projects-section-header">
                <p>New Service</p>
            </div>
            <div className="messages">
                <div className="message-box">
                    <form onSubmit={handleSubmit} className="flex flex-col w-full">
                        <input
                            className="bg-[#e9e7fd] text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-[#a7a2d1] focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            placeholder="Name" type="text" name="name" value={formData.name} onChange={handleChange} />
                        <input
                            className="bg-[#e9e7fd] text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-[#a7a2d1] focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            placeholder="Description" type="text" name="description" value={formData.description} onChange={handleChange} />
                        <input 
                            className="bg-[#e9e7fd] text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-[#a7a2d1] focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            placeholder="Price" type="number" name="price" value={formData.price} onChange={handleChange} />
                        <select 
                            className="bg-[#e9e7fd] text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-[#a7a2d1] focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            name="category_id" value={formData.category_id} onChange={handleChange}>
                            <option value="">Select Category</option>
                            {categories.map((category) => (
                                <option key={category.id} value={category.id}>{category.name}</option>
                            ))}
                        </select>
                        <button 
                            className="bg-[#e9e7fd] text-[#515461] font-bold py-2 px-4 rounded-md mt-4 hover:text-white hover:bg-[#8a82e2] transition ease-in-out duration-150"
                            type="submit">Add Service</button>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default ServiceForm;
