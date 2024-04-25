import { useState } from 'react';
import axios from '../axios';

const ServiceForm = ({categories, fetchData}) => {
    const [formData, setFormData] = useState({
        name: '',
        description: '',
        price: '',
        category_id: '',
    });

    const [file, setFile] = useState();
    function handleImage(e) {
        console.log(e.target.files);
        setFile(URL.createObjectURL(e.target.files[0]));
    }

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
                        <div className="file-upload-form">
                            <label htmlFor="file" className="file-upload-label">
                                <div className="file-upload-design">
                                    <svg viewBox="0 0 640 512" height="1em">
                                        <path
                                        d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"
                                        ></path>
                                    </svg>
                                    <p>Drag and Drop</p>
                                    <p>or</p>
                                    <span className="browse-button">Browse file</span>
                                </div>
                                <img src={file} />
                                <input id="file" type="file" onChange={handleImage}/>
                            </label>
                        </div>

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
