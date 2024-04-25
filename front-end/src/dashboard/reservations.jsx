import { useContext } from "react";
import { MyContext } from "./app.jsx";
import axios from "../axios.jsx";

const Reservations = () => {
  const { categories, reservations, formatDate, fetchReservations } = useContext(MyContext);

  const acceptReservation = async (reservationId ) => {
    try {
      await axios.post(`/reservations/${reservationId}/accept`);
      fetchReservations();
    } catch (error) {
      console.error('Error accepting reservation:', error);
    }
  };

  const rejectReservation = async (reservationId ) => {
    try {
      await axios.post(`/reservations/${reservationId}/reject`);
      // Optionally, you can update the UI here
		fetchReservations();

    } catch (error) {
      console.error('Error rejecting reservation:', error);
    }
  };

  return (
    <div className="projects-section">
      <div className="items-center px-2 py-4 mx-0 my-10 bg-white rounded-lg shadow-md">
        <div className="container mx-auto">
          <div className="flex justify-between w-full px-4 py-2 items-center">
            <div className="text-xl font-bold">Reservations</div>
          </div>
          <ul className="flex flex-row space-x-2 sm:space-x-6 md:space-x-12 mt-4 mx-4 items-center border-b border-gray-300 overflow-auto text-sm">
            {categories.map((category) => (
              <li className="group" key={category.id}>
                <a href="#">{category.name}</a>
                <div className="h-1 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out"></div>
              </li>
              // <option key={category.id} value={category.id}>{category.name}</option>
            ))}
            <li className=" text-blue-500 group">
              <a href="#">Indoor Plant</a>
              <div className="h-1 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out"></div>
            </li>
            {/* <li className="group">
              <a href="#">Outside Plant</a>
              <div className="h-1 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out"></div>
            </li>
            <li className="group">
              <a href="#">Flower Pots</a>
              <div className="h-1 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out"></div>
            </li>
            <li className="group">
              <a href="#">Fertilizers and Soil</a>
              <div className="h-1 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out"></div>
            </li> */}
          </ul>
          <div className="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:justify-between w-full px-4 mb-2 mt-4 items-center">
            {/* <div className="flex bg-gray-100 w-full sm:w-2/5 items-center rounded-lg">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                className="h-4 w-4 mx-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
              </svg>
              <input
                className="w-full bg-gray-100 outline-none border-transparent focus:border-transparent focus:ring-0 rounded-lg text-sm"
                type="text"
                placeholder="Search a product..."
              />
            </div> */}
            <div></div>
            <div className="flex-row space-x-2 items-center ">
              <select
                className="border border-gray-300 rounded-md text-gray-600 px-2 pl-2 pr-8 bg-white hover:border-gray-400 focus:outline-none text-xs
           focus:ring-0"
              >
                <option>Status</option>
                <option>Accepted</option>
                <option>Rejected</option>
              </select>
              {/* <select
                className="border border-gray-300 rounded-md text-gray-600 px-2 pl-2 pr-8 bg-white hover:border-gray-400 focus:outline-none text-xs
          focus:ring-0"
              >
                <option>Short by</option>
                <option></option>
                <option></option>
              </select> */}
              <button
                className="border border-gray-300 rounded-md text-gray-600 px-3 py-[9px] bg-white hover:border-gray-400 focus:outline-none text-xs
        focus:ring-0"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-3 w-3"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth="2"
                    d="M19 13l-7 7-7-7m14-8l-7 7-7-7"
                  />
                </svg>
              </button>
            </div>
          </div>
          <div className="mt-6 overflow-x-auto">
            <table className="w-full table-auto">
              <thead className="">
                <tr className="text-sm font-semibold text-center border-b-2 border-blue-500 uppercase">
                  <th className="px-4 py-3">Client</th>
                  <th className="px-4 py-3">Service</th>
                  <th className="px-4 py-3">Status</th>
                  <th className="px-4 py-3">Date of Reservation</th>
                  <th className="px-4 py-3">action</th>
                </tr>
              </thead>
              <tbody className="text-sm font-normal text-gray-700 text-center">
                {reservations.map((reservation) => (
                  <tr className="py-10 bg-gray-100 hover:bg-gray-200 font-medium" key={reservation.id}>
                    <td className="px-4 py-4">{reservation.user.name}</td>
                    <td className="px-4 py-4">{reservation.service.name}</td>
                    <td className="px-4 py-4">{reservation.status}</td>
                    <td className="items-center px-4 py-4">
                      <div className="flex flex-col">
                        <div className="font-medium ">{formatDate(reservation.created_at)}</div>
                        <div className="text-xs text-gray-500">10 days</div>
                      </div>
                    </td>
                    <td className="px-4 py-4">
						{/* <div className="radio-input">
							<label className="label">
								<input type="radio" name="radio"/>
								<span className="check"></span>
							</label>
							<label className="label">
								<input type="radio" name="radio"/>
								<span className="check"></span>
							</label>
						</div> */}
						<center className="reject-accept">
							{/* <br/> */}
							<button className="accept" onClick={()=>acceptReservation(reservation.id)}> <span className="fa fa-check"></span></button>
							<button className="deny" onClick={()=>rejectReservation(reservation.id)}> <span className="fa fa-close"></span></button>
						</center>
					</td>
                  </tr>
                ))}
                ;
              </tbody>
            </table>
          </div>
          <div className="flex flex-col items-center w-full px-4 py-4 text-sm text-gray-500 justify-center mx-auto">
            <div className="flex items-center justify-between space-x-2">
              <a href="#" className="hover:text-gray-600">
                Previous
              </a>
              <div className="flex flex-row space-x-1">
                <div className="flex px-2 py-px text-white bg-blue-400 border border-blue-400">
                  1
                </div>
                <div className="flex px-2 py-px border border-blue-400 hover:bg-blue-400 hover:text-white">
                  2
                </div>
              </div>
              <a href="#" className="hover:text-gray-600">
                Next
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Reservations;
