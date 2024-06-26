import { useContext } from "react";
import { MyContext } from "./app.jsx";
import axios from "../axios.jsx";

const Reservations = () => {
  const { reservations, formatDate, fetchReservations } = useContext(MyContext);

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
		fetchReservations();

    } catch (error) {
      console.error('Error rejecting reservation:', error);
    }
  };

  const completeReservation = async (reservationId ) => {
    try {
      await axios.put(`/reservations/${reservationId}/complete`);
      fetchReservations();

    } catch (error) {
      console.error('Error completing reservation:', error);
    }
  }

  return (
    <div className="projects-section">
      <div className="items-center px-2 py-4 mx-0 my-10 bg-white rounded-lg shadow-md">
        <div className="container mx-auto">
          <div className="flex justify-between w-full px-4 py-2 items-center">
            <div className="text-xl font-bold">Reservations</div>
          </div>

          <div className="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:justify-between w-full px-4 mb-2 mt-4 items-center">
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
                      <center className="reject-accept">
                      { reservation.status === 'pending' ? (
                        <>
                          <button className="accept" onClick={()=>acceptReservation(reservation.id)}> <span className="fa fa-check"></span></button>
                          <button className="deny" onClick={()=>rejectReservation(reservation.id)}> <span className="fa fa-close"></span></button>
                        </>
                        ) : reservation.status === 'confirmed' ?(
                          <button className="completed" onClick={()=>completeReservation(reservation.id)}> <span className="button_top"> Complete</span></button>
                        ) : reservation.status === 'cancelled' ? (
                          <h2>Canceled</h2>
                        ) : (
                          <h2>Completed</h2>
                        )
                      }
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
