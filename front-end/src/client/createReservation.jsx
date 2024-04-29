import { useEffect, useState } from "react";
import { useNavigate } from 'react-router-dom';
import  axios  from "../axios";

const CreateModal = ({closeModal }) => {
    const [formData, setFormData] = useState({
        service_id: '',
        status: '',
        notes: ''
    })
    const [message, setMessage] = useState('');

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();
        const token = sessionStorage.getItem('token');
    };

	const reserve = async () => {
        try {
            const response = await axios.post('/reservations', {
                service_id: service.id,
                status: 'pending'
            }, {
                headers: {
                    Authorization: `Bearer ${sessionStorage.getItem('token')}`
                }
            });
            console.log(response);
        } catch (error) {
            console.error('Reservation failed!', error.response.data);
        }
    }

    return (
        <div className="modal">
            <div className="modal-content">
                <div className="modal-top">
                    <h2>Reserve</h2>
                    <h4 className="close" onClick={closeModal}>x</h4>
                </div>
                <div className="modal-body">
                    <form className="createModal" onSubmit={handleSubmit} method="post">
                        <div className="input-group">
                            <label htmlFor="patient_id"></label>
                            <select name="patient_id" id="patient_id" onChange={handleChange}>
                                <option value="" hidden>Select Patient</option>
                            </select>
                        </div>
                        <div className="input-group">
                            <label htmlFor="date">Date</label>
                            <input type="datetime-local" name="date" id="date" value={formData.date} onChange={handleChange}/>
                        </div>
                        <p className="message">
                            {(message) ?
                                <div>
                                    <i className="fa-solid fa-circle-exclamation"></i>
                                    <span>{message}</span>
                                </div> : ''}
                        </p>
                        <div className="input-group">
                            <label htmlFor="notes">Notes</label>
                            <textarea name="notes" id="notes" rows="6" value={formData.notes} onChange={handleChange}></textarea>
                        </div>
                        <button type="submit">{'Create Appointment'}</button>
                    </form>
                </div>
            </div>
        </div>
    );
}

export default CreateModal;