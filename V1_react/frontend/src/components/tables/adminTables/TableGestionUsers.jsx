import axios from "axios";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import { confirmAlert } from 'react-confirm-alert';
import 'react-confirm-alert/src/react-confirm-alert.css';


const UserGestionTable = () => {
    const [users, setUsers] = useState([]);
    const location = useLocation();
    const token = location.state.token;
    const id = location.state.id;
    

    //fetching the users data
    useEffect(() => {
        const fetchUsers = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/getusers"
                );
                setUsers(response.data.user);
            } catch (error) {
                console.error("Error:", error);
            }
        };

        fetchUsers();
    }, []);

    // handling delete -------------
    const  HandelDelete =  (userId ) => {
        confirmAlert ( {
          title: 'Confirmation',
          message: 'Are you sure you want to delete this user?',
          buttons: [
            {
              label: 'Yes',
              onClick: () => {
                Delete(userId)
                console.log('User deleted!');
              }
            },
            {
              label: 'No',
              onClick: () => {
                console.log('Deletion canceled!');
              }
            }
          ]
        });
      };
          
    const Delete = async (userId ) => {
        try{
            const config = {
                headers: {
                  Authorization: `Bearer ${token}`,
                },
            };

            await axios.delete(`http://127.0.0.1:8000/api/destroy/${userId}` , config);
            setUsers((prevUsers) => prevUsers.filter((user) => user.id !== userId));
        }catch(error) {
            console.log('Error : ' ,error);
        }
    };
    // ---------------------------
    // cheking if the array is empty
    if (!Array.isArray(users)) {
        return <div>Loading...</div>; // Add a loading state or handle the case when users is not an array
    }

    return (
        <>  
            <h3>Gestion Members</h3>
            <table class="table  table-bordered">
                <thead className="table-primary ">
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {users.map((user) => (
                        <tr className="text-left" key={user.id}>
                            <td>{user.username}</td>
                            <td>{user.lastname}</td>
                            <td>{user.firstname}</td>
                            <td>{user.email}</td>
                            <td>{user.phone}</td>
                            <td>{user.gender}</td>
                            <td>{user.role}</td>
                            <td>
                            {user.id !== id ? (
                                    <button
                                    className="btn btn-danger"
                                        variant="danger"
                                        onClick={() => HandelDelete(user.id)}
                                    >
                                        Delete
                                    </button>
                                ) : (
                                        'admin'
                                )}
                            </td>

                        </tr>
                    ))}
                </tbody>
            </table>
        </>
    );
};

export default UserGestionTable;
