const Statistics = () => {
  return (
    // <div className="messages-section">
    //         <button className="messages-close">
    //             <svg xmlns="http://www.w3.org/2000/svg"Width="24" height="24" viewBox="0 0 24 24"
    //                 fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round"
    //                 strokeLinejoin="round" className="feather feather-x-circle">
    //                 <circle cx="12" cy="12" r="10" />
    //                 <line x1="15" y1="9" x2="9" y2="15" />
    //                 <line x1="9" y1="9" x2="15" y2="15" />
    //             </svg>
    //         </button>
    //         <div className="projects-section-header">
    //             <p>Statistics</p>
    //         </div>
    //         <div className="messages">
    //             <div className="grid grid-cols-1 gap-8 p-10">
    //                 <div className="flex items-center shadow justify-between p-4 bg-white rounded-md dark:bg-darker">
    //                     <div>
    //                         <h6
    //                             className="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
    //                             Value
    //                         </h6>
    //                         <span className="text-xl font-semibold">totalRevenue</span>
    //                         <span
    //                             className="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
    //                             +4.4%
    //                         </span>
    //                     </div>
    //                     <div>
    //                         <span>
    //                             <svg className="w-12 h-12 text-gray-300 dark:text-primary-dark"
    //                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
    //                                 stroke="currentColor">
    //                                 <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
    //                                     d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
    //                                 </path>
    //                             </svg>
    //                         </span>
    //                     </div>
    //                 </div>

    //                 {/* <!-- Users card --> */}
    //                 <div className="flex items-center shadow justify-between p-4 bg-white rounded-md dark:bg-darker">
    //                     <div>
    //                         <h6
    //                             className="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
    //                             Users
    //                         </h6>
    //                         <span className="text-xl font-semibold">20</span>
    //                         <span
    //                             className="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
    //                             +2.6%
    //                         </span>
    //                     </div>
    //                     <div>
    //                         <span>
    //                             <svg className="w-12 h-12 text-gray-300 dark:text-primary-dark"
    //                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
    //                                 stroke="currentColor">
    //                                 <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
    //                                     d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
    //                                 </path>
    //                             </svg>
    //                         </span>
    //                     </div>
    //                 </div>

    //                 {/* <!-- Orders card --> */}
    //                 <div className="flex items-center shadow justify-between p-4 bg-white rounded-md dark:bg-darker">
    //                     <div>
    //                         <h6
    //                             className="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
    //                             Events
    //                         </h6>
    //                         <span className="text-xl font-semibold">30</span>
    //                         <span
    //                             className="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
    //                             +3.1%
    //                         </span>
    //                     </div>
    //                     <div>
    //                         <span>
    //                             <svg className="w-12 h-12 text-gray-300 dark:text-primary-dark"
    //                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
    //                                 <path fill="#e2e4e8"
    //                                     d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z" />
    //                             </svg>
    //                         </span>
    //                     </div>
    //                 </div>

    //                 {/* <!-- Tickets card --> */}
    //                 <div className="flex items-center shadow justify-between p-4 bg-white rounded-md dark:bg-darker">
    //                     <div>
    //                         <h6
    //                             className="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
    //                             Tickets
    //                         </h6>
    //                         <span className="text-xl font-semibold">28</span>
    //                         <span
    //                             className="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
    //                             +3.1%
    //                         </span>
    //                     </div>
    //                     <div>
    //                         <span>
    //                             <svg className="w-12 h-12 text-gray-300 dark:text-primary-dark"
    //                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
    //                                 stroke="currentColor">
    //                                 <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
    //                                     d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
    //                                 </path>
    //                             </svg>
    //                         </span>
    //                     </div>
    //                 </div>
    //             </div>
    //         </div>
    // </div>
    <div className="messages-section container">
      <div className="flex flex-col pb-1 mx-2 md:mx-24 lg:mx-0">
		<div className="projects-section-header">
            <p>Statistics</p>
		</div>
        {/* <ul className="w-full sm:w-4/5 text-xs sm:text-sm justify-center lg:justify-end items-center flex flex-row space-x-1 mt-2 overflow-hidden mb-4">
          <li>
            <button className="px-4 py-2 bg-indigo-500 rounded-full text-sm text-gray-100 hover:bg-indigo-700 hover:text-gray-200">
              30 days
            </button>
          </li>
          <li>
            <button className="px-4 py-2 bg-gray-200 rounded-full text-sm text-gray-700 hover:bg-indigo-700 hover:text-gray-200">
              90 days
            </button>
          </li>
          <li>
            <button className="px-4 py-2 bg-gray-200 rounded-full text-sm text-gray-700 hover:bg-indigo-700 hover:text-gray-200">
              6 months
            </button>
          </li>
          <li>
            <button className="px-4 py-2 bg-gray-200 rounded-full text-sm text-gray-700 hover:bg-indigo-700 hover:text-gray-200">
              12 months
            </button>
          </li>
        </ul> */}
        <div className="w-full p-2">
          <div className="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
            <div className="flex flex-row justify-between items-center h-4">
              <div className="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 group-hover:text-gray-50"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fillRule="evenodd"
                    d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                    clipRule="evenodd"
                  />
                  <path
                    fillRule="evenodd"
                    d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                    clipRule="evenodd"
                  />
                </svg>
              </div>
              <div className="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 mr-2 text-green-500 group-hover:text-gray-200"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  strokeWidth="2"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
                12%
              </div>
            </div>
            <h1 className="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
              42.34%
            </h1>
            <div className="flex flex-row justify-between group-hover:text-gray-200">
              <p>Bounce Rate</p>
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-5 w-5 text-indigo-600 group-hover:text-gray-200"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fillRule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </div>
        </div>
        <div className="w-full p-2">
          <div className="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
            <div className="flex flex-row justify-between items-center h-4">
              <div className="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 group-hover:text-gray-50"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                </svg>
              </div>
              <div className="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 mr-2 text-green-500 group-hover:text-gray-200"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  strokeWidth="2"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
                12%
              </div>
            </div>
            <h1 className="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
              42.34%
            </h1>
            <div className="flex flex-row justify-between group-hover:text-gray-200">
              <p>Page Per Visits</p>
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-5 w-5 text-indigo-600 group-hover:text-gray-200"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fillRule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </div>
        </div>
        <div className="w-full p-2">
          <div className="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
            <div className="flex flex-row justify-between items-center h-4">
              <div className="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 group-hover:text-gray-50"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                  <path
                    fillRule="evenodd"
                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                    clipRule="evenodd"
                  />
                </svg>
              </div>
              <div className="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 mr-2 text-green-500 group-hover:text-gray-200"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  strokeWidth="2"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
                12%
              </div>
            </div>
            <h1 className="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
              42.34k
            </h1>
            <div className="flex flex-row justify-between group-hover:text-gray-200">
              <p>Total Monthly Visits</p>
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-5 w-5 text-indigo-600 group-hover:text-gray-200"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fillRule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </div>
        </div>
        {/* <div className="w-full p-2">
          <div className="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
            <div className="flex flex-row justify-between items-center">
              <div className="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 group-hover:text-gray-50"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fillRule="evenodd"
                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                    clipRule="evenodd"
                  />
                </svg>
              </div>
              <div className="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 mr-2 text-green-500 group-hover:text-gray-200"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  strokeWidth="2"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
                12%
              </div>
            </div>
            <h1 className="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
              00:03:20%
            </h1>
            <div className="flex flex-row justify-between group-hover:text-gray-200">
              <p>Avg. Visit Duration</p>
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-5 w-5 text-indigo-600 group-hover:text-gray-200"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fillRule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </div>
        </div> */}
      </div>
    </div>
  );
};

export default Statistics;
